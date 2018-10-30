<template>
    <div id="wrapper">
        <v-layout row wrap>
            <v-flex xs6>
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
                                    >次へ <v-icon>arrow_forward</v-icon></v-btn>
                                </div>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-form>
            </v-flex>

            <v-flex xs6>

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