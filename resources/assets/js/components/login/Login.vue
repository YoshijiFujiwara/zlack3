<template>
    <v-form @submit.prevent="login">
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

        <!--<v-text-field-->
            <!--id="workspaceTextField"-->
            <!--v-model="loginForm.workspaceId"-->
            <!--type="hidden"-->
        <!--&gt;</v-text-field>-->

        <v-btn
            block
            color="green"
            type="submit"
        >ログイン</v-btn>
    </v-form>

</template>

<script>
export default {
    data(){
        return {
            // ログイン用
            loginForm: {
                email: null,
                password: null,
                workspaceId: null
            },
            targetWorkspace: null
        }
    },
    created() {
        // ログイン先のワークスペース情報を取得する
        axios.get(`/api/target_workspace/${this.$route.params.workspaceId}`)
            .then(res => {
                this.targetWorkspace = res.data.data;
            })
            .catch(error => console.log(error));
        this.loginForm.workspaceId = this.targetWorkspace.id;
    },
    methods: {
        login() {
            // User.login(this.loginForm);

            axios.post('/api/auth/login', this.loginForm)
                .then(res => {
                    Token.payload(res.data);
                })
                .catch(error => console.log(error.response.data));
        }
    }
}
</script>

<style>
#workspaceTextField {
    display: none;
}
</style>
