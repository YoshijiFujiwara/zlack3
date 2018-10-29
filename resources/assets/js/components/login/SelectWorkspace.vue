<template>
    <v-layout>
        <v-flex xs12 sm6 offset-sm3>
            <!-- ログインするワークスペースがまだ発見していない -->
            <div v-if="targetWorkspace === null">
                <v-form @submit.prevent="selectWorkspace">
                    <v-card>
                        <v-card-title primary-title>
                            <div>
                                <h3 class="headline mb-3">ワークスペースにサインインする</h3>
                                <p>​参⁠加⁠し⁠て⁠い⁠る⁠ワ⁠ー⁠ク⁠ス⁠ペ⁠ー⁠ス⁠の​Slack URL を入力してください。</p>

                                <v-layout>
                                    <v-text-field
                                        v-model="form.workspaceUrl"
                                        type="text"
                                        required
                                        placeholder="your-workspace-url"
                                        outline
                                    ></v-text-field>
                                    <span id="zlackcom">.zlack.com</span>
                                </v-layout>
                            </div>
                        </v-card-title>

                        <v-card-actions>
                            <v-btn
                                    block
                                    color="success"
                                    dark
                                    type="submit"
                            >続行する&nbsp;<v-icon>arrow_right_alt</v-icon></v-btn>
                        </v-card-actions>
                    </v-card>
                </v-form>
            </div>

            <!-- ログインするワークスペースが発見済み -->
            <div v-else>
                <login target-workspace-name="targetWorkspace.name"></login>
            </div>
        </v-flex>
    </v-layout>
</template>

<script>
import Login from './Login';

export default {
    components: {Login},
    data(){
        return {
          form: {
            workspaceUrl: null,
          },
          targetWorkspace: null,
          errors: {},
        }
    },
    methods: {
        selectWorkspace() {
            axios.post('/api/auth/selectWorkspace', this.form)
                .then(res => this.$router.push(`/login/${res.data.data.id}`))
                .catch(error => console.log(error));
        },
    }
}
</script>

<style>
#zlackcom {
    font-size: 30px;
    padding-bottom: 0px;
}
</style>
