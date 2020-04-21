This document describes how to work with Artifacts in the following sections:

* TOC
{:toc}

## Artifacts Overview

![artifacts tab screeshot]({{ site.baseurl }}/assets/img/docs/artifacts.png)

Find links to the artifacts at the top of the **Job page**. Artifacts are stored on Amazon S3 and are protected with your CircleCI account for private projects. There is a 3GB `curl` file size limit. Artifacts are designed to be useful around the time of the build. It is best practice not to rely on artifacts as a software distribution mechanism with long term future guarantees.

- nnoirファイルへの変換
  - `nnoir-onnx`
    - サポートされるオペレータ
      - <https://pypi.org/project/nnoir-onnx/> の"Supported ONNX Operators"参照
  - `nnoir-chainer`
    - サポートされる層
      - <https://pypi.org/project/nnoir-chainer/> の"These layers supported by nnoir-chainer exporter." 以下参照
- nnoirファイルからcランタイムへの変換
  - `nnoir-onnx1s` some text `nnoir-onnx`
    - AveragePoll, MaxPool, Convolution層は2Dのみサポート
    - LRNの利用は非推奨
  - `nnoir-chainer`を利用時は`resize_image`に対応
  - LSTMは非対応
  - `nnoir-onnx` `nnoir-onnx`