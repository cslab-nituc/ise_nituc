# 新サイト候補

`docs_new` は、宇部工業高等専門学校 制御情報工学科の新サイト候補です。
既存の `docs` は旧サイトの参照用として変更せず、公開に必要な静的ファイルだけをこのディレクトリで管理します。

## ローカルでの確認

画像は既存の `docs` にあるファイルをそのまま利用します。Pull Request にバイナリファイルを含めないため、初回だけリポジトリのルートで次のコマンドを実行してコピーしてください。

```sh
mkdir -p docs_new/assets/images
cp docs/img/placeholders/slider-slide-1.jpg docs_new/assets/images/hero.jpg
cp docs/img/about01.jpg docs_new/assets/images/about.jpg
```

コピーした画像は `docs_new/assets/images/.gitignore` により、このリポジトリではGitの管理対象になりません。

続いて、リポジトリのルートでローカルサーバーを起動します。

```sh
python3 -m http.server 8000
```

ブラウザで <http://localhost:8000/docs_new/> を開いてください。

## 移行時の注意

- 新しいリポジトリには、このディレクトリの中身だけをコピーします。
- 新しいリポジトリへ移行するときは、上記2点の画像もコピーしたうえで、`assets/images/.gitignore` を削除して画像をGitの管理対象にします。
- PHP、CMSの設定、キャッシュ、バックアップファイルは追加しません。
- お知らせや画像を追加する前に、内容と掲載許諾について教員の確認を受けます。
- 就職実績、連絡先、教員情報など変更される情報は、公開前に学校公式サイトと照合します。
