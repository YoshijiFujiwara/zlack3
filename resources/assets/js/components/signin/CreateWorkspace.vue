<template>
    <div id="wrapper">
        <v-layout row wrap>
            <!-- 左半分 -->
            <v-flex xs4>
                <v-toolbar
                    class="elevation-0 transparent"
                >
                    <v-toolbar-title>Zlack</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>

                <v-form>
                    <v-layout id="create_card">
                        <v-flex xs10 class="mx-auto">
                            <div>
                                <v-card-title primary-title>
                                    <h2 class="headline mb-3 font-weight-bold">ワークスペースを新規作成する</h2>
                                    <p>あなたの<span class="font-weight-bold">メールアドレス</span></p>

                                    <v-flex xs12>
                                        <v-text-field
                                            v-model="form.email"
                                            placeholder="自分の名前@example.com"
                                            :error-messages="emailErrorMessage()"
                                            outline
                                        ></v-text-field>
                                    </v-flex>
                                </v-card-title>
                            </div>

                            <v-layout>
                                <div class="mx-auto px-auto">
                                    <v-btn depressed large :disabled="nextButtonDisabled()"
                                    :class="nextButtonClass()"
                                    @click.prevent="sendConfirmEmail()"
                                    >次へ <v-icon>arrow_forward</v-icon></v-btn>
                                </div>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-form>
            </v-flex>

            <!-- 右半分 -->
            <v-flex xs8>
                <v-parallax
                    height="1000"
                    dark
                    src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
                >
                    <v-layout
                        align-center
                        column
                        justify-start
                    >
                        <p class="headline font-weight-thin mb-3 mt-4">
                            既存のワークスペースに参加する？
                            <v-btn
                            outline
                            color="white"
                            @click.prevent="moveGetStarted()"
                            ><span class="font-weight-bold">ワークスペースを検索</span></v-btn>
                        </p>
                    </v-layout>
                </v-parallax>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email:null,
            },
            emailIsValid: false,
        }
    },
    methods: {
        emailErrorMessage() {
            let isValid = /.+@.+/.test(this.form.email);
            if (this.form.email != null && !isValid) {
                this.emailIsValid = false;
                return '申し訳ありませんが、その電子メールは無効です。';
            }
            if (this.form.email != null && isValid) {
                this.emailIsValid = true;
            }
        },
        nextButtonDisabled() {
            return ! this.emailIsValid;
        },
        nextButtonClass() {
            if (this.emailIsValid) {
                return 'success';
            }
            return '';
        },
        // 確認用メールの送信
        sendConfirmEmail() {
            axios.get('/api/create_workspace/send_confirm_email')
                .then(res => console.log(res))
                .catch(error => console.log(error));
        },
        // ここから始める　の画面へ
        moveGetStarted() {
            this.$router.push('/get-started');
        }
    },
}
</script>

<style>
#wrapper {
    position: relative;
}
#create_card {
    position: relative;
    top: 50%;
}
</style>