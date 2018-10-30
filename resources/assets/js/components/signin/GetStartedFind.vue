<template>
    <get-started-layout>
        <v-list three-line>
            <v-list-tile>
                <div class="headline font-weight-bold">Zlack ワークスペースを検索</div>
            </v-list-tile>

            <v-list-tile>
                <p>メールアドレスを確認し、参加済みのワークスペースや参加可能なワークスペースを探すためのメールが届きます。</p>
            </v-list-tile>

            <v-form>
                <v-text-field
                    v-model="form.email"
                    placeholder="自分の名前@example.com"
                    :error-messages="emailErrorMessage()"
                    outline
                ></v-text-field>

                <v-btn block depressed large :disabled="confirmButtonDisabled()"
                   :class="confirmButtonClass()"
                   @click.prevent="sendConfirmEmail()"
                >確認する</v-btn>
            </v-form>

        </v-list>
    </get-started-layout>
</template>

<script>
    export default {
        data: () => ({
            form: {
                email:null,
            },
            emailIsValid: false,
        }),
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
            confirmButtonDisabled() {
                return ! this.emailIsValid;
            },
            confirmButtonClass() {
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
        }
    }
</script>

<style>

</style>
