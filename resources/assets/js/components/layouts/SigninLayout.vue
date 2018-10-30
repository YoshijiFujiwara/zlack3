<template>
    <div>
        <signin-toolbar></signin-toolbar>

        <v-content>
            <v-container fluid fill-height>
                <slot></slot>
            </v-container>
        </v-content>
    </div>
</template>

<script>
import SigninToolbar from './accessroies/SigninToolbar';

export default {
    components: {SigninToolbar},
    created() {

    }
}
</script>

<style>

</style>