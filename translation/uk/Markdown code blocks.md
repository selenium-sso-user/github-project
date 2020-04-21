This document describes how to work with Artifacts in the following sections:

* TOC
{:toc}

## Artifacts Overview

![artifacts tab screeshot]({{ site.baseurl }}/assets/img/docs/artifacts.png)

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

Currently, `store_artifacts` has two keys: `path` and `destination`.

  - `path` is a path to the file or directory to be uploaded as artifacts.
  -

## Uploading Core Files

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
