<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zlackの確認コード</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">

    <style></style>
</head>
<body>
<div id="app">
    <v-app>
        <v-layout row wrap>
            <v-flex xs6>
                <div>
                    <v-card-title primary-title>
                        <h2 class="headline mb-3 font-weight-bold">メールアドレスを確認する</h2>
                        <p>Slack にサインアップしていただきありがとうございます。Slack 仲間が増えてうれしいです！<br><br>
                            Slack ワークスペースの新規作成を開始するウィンドウで、次のコードを入力してください :<br></p>

                        <v-jumbotron>
                            <v-container fill-height>
                                <v-layout align-center>
                                    <v-flex text-xs-center>
                                        <h3 class="display-3">{{!! $randomNumberStr !!}}</h3>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-jumbotron>

                        <p>このメールには、Zlack アカウントに関するあなたの個人情報が含まれていますので、転送はしないでください。Zlack の設定について何か質問がありましたら、feedback@zlack.com までメールでお気軽にお問い合わせください。(日本語でのお問い合わせにも対応しています！)</p>
                    </v-card-title>
                </div>
            </v-flex>
        </v-layout>
    </v-app>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script>
    new Vue({ el: '#app' })
</script>
</body>
</html>
