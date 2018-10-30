<template>
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
                                    <h3 class="display-3">{{ confirmNumber }}</h3>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-jumbotron>

                    <p>このメールには、Zlack アカウントに関するあなたの個人情報が含まれていますので、転送はしないでください。Zlack の設定について何か質問がありましたら、feedback@zlack.com までメールでお気軽にお問い合わせください。(日本語でのお問い合わせにも対応しています！)</p>
                </v-card-title>
            </div>
        </v-flex>
    </v-layout>
</template>

<script>
export default {
    props: ['confirmNumber'],
}
</script>

<style>

</style>
