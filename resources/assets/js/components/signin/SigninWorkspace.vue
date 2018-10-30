<template>
    <signin-layout>
        <v-layout>
        <v-flex xs12 sm6 offset-sm3>
            <v-form @submit.prevent="login">
                <v-card
                    class="px-3 py-3"
                >
                    <h2>ワークスペース: {{ targetWorkspace.name }} にログインする</h2>

                    <v-text-field
                        v-model="loginForm.email"
                        type="email"
                        label="メールアドレス"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="loginForm.password"
                        type="password"
                        label="パスワード"
                        required
                    ></v-text-field>

                    <v-btn
                        block
                        color="green"
                        type="submit"
                    >ログイン</v-btn>
                </v-card>
            </v-form>
        </v-flex>
    </v-layout>
    </signin-layout>
</template>

<script>
    export default {
        data(){
            return {
                // ログイン用
                loginForm: {
                    email: null,
                    password: null,
                },
                targetWorkspace: null
            }
        },
        created() {
            // ログイン先のワークスペース情報を取得する
            axios.post(`/api/target_workspace/${this.$route.params.workspace_id}`)
                .then(res => {
                    this.targetWorkspace = res.data.data;
                })
                .catch(error => console.log(error));
            this.loginForm.workspace_id = this.targetWorkspace.id;
        },
        methods: {
            login() {
                this.loginForm.workspace_id = this.targetWorkspace.id;
                User.login(this.loginForm);
            }
        }
    }
</script>

<style>
</style>
