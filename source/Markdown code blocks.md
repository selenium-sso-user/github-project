This document describes how to work with Artifacts in the following sections:

* TOC
{:toc}

## Artifacts Overview

![artifacts tab screeshot]({{ site.baseurl }}/assets/img/docs/artifacts.png)

Find links to the artifacts at the top of the **Job page**.
Artifacts are stored on Amazon S3 and are protected with your CircleCI account for private projects.
There is a 3GB `curl` file size limit.
Artifacts are designed
to be useful around the time of the build.
It is best practice
not to rely on artifacts as a software distribution mechanism with long term future guarantees.

**Note:**
Uploaded artifact filenames are encoded
using the [Java URLEncoder](https://docs.oracle.com/javase/7/docs/api/java/net/URLEncoder.html).
Keep this in mind
if you are expecting
to find artifacts at a given path within the application.

## Uploading Artifacts

To upload artifacts created during builds, use the following example:

```yaml
version: 2
jobs:
  build:
    docker:
      - image: python:3.6.0-jessie

    working_directory: /tmp
    steps:
      - run:
          name: Creating Dummy Artifacts
          command: |
            echo "my artifact file" > /tmp/artifact-1;
            mkdir /tmp/artifacts;
            echo "my artifact files in a dir" > /tmp/artifacts/artifact-2;

      - store_artifacts:
          path: /tmp/artifact-1
          destination: artifact-file

      - store_artifacts:
          path: /tmp/artifacts
```

The `store_artifacts` step uploads two build artifacts: a file (`/tmp/artifact-1`) and a directory (`/tmp/artifacts`). After the artifacts successfully upload, view them in the **Artifacts** tab of the **Job page** in your browser. There is no limit on the number of `store_artifacts` steps a job can run.

Currently, `store_artifacts` has two keys: `path` and `destination`.

  - `path` is a path to the file or directory to be uploaded as artifacts.
  - `destination` **(Optional)** is a prefix added to the artifact paths in the artifacts API. The directory of the file specified in `path` is used as the default.

## Uploading Core Files

This section describes how to get [core dumps](http://man7.org/linux/man-pages/man5/core.5.html) and push them as artifacts for inspection and debugging. The following example creates a short C program that runs [`abort(3)`](http://man7.org/linux/man-pages/man3/abort.3.html) to crash the program.

1. Create a `Makefile` with the following lines:

     ```
     all:
       gcc -o dump main.c
     ```

2. Create a `main.c` file with the following lines.

     ```C
     #include <stdlib.h>
     
     int main(int argc, char **argv) {
         abort();
     }
     ```

3. Run `make` and `./dump` on the generated program to print `Aborted (core dumped)`!

Following is a full `config.yml` that compiles the example C abort program, and collects the core dumps as artifacts.

```yaml
version: 2
jobs:
  build:
    docker:
      - image: gcc:8.1.0
    working_directory: ~/work
    steps:
      - checkout
      - run: make
      - run: |
          # tell the operating system to remove the file size limit on core dump files 
          ulimit -c unlimited
          ./dump
      - run:
          command: |
            mkdir -p /tmp/core_dumps
            cp core.* /tmp/core_dumps
          when: on_fail
      - store_artifacts:
          path: /tmp/core_dumps
```

The `ulimit -c unlimited` removes the file size limit on core dump files. With the limit removed, every program crash creates a core dump file in the current working directory. The core dump file is named `core.%p.%E` where `%p` is the process id and `%E` is the pathname of the executable. See the specification in `/proc/sys/kernel/core_pattern` for details.

Finally, the core dump files are stored to the artifacts service with `store_artifacts` in the `/tmp/core_dumps` directory.

{{ site.data.reusables.command_line.open_the_multi_os_terminal }}
1. Enter `ls -al ~/.ssh` to see if existing SSH keys are present:

  ```shell
$ ls -al ~/.ssh
# Lists the files in your .ssh directory, if they exist
  ```
2. Check the directory listing to see if you already have a public SSH key.

- With GPU

  ```cmd
  pip3 install https://cntk.ai/PythonWheel/GPU/cntk-2.3.1-cp35-cp35m-win_amd64.whl
  # Lists the files in your .ssh directory, if they exist
  ```

By default, the filenames of the public keys are one of the following:

* *id_dsa.pub*
* *id_ecdsa.pub*
* *id_ed25519.pub*
* *id_rsa.pub*
