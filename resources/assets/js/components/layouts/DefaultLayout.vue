<template>
    <div>
        <navigation></navigation>
        <toolbar></toolbar>

        <v-content>
            <v-container fluid fill-height>
                <slot></slot>
            </v-container>
        </v-content>
    </div>
</template>

<script>
import Navigation from './Navigation';
import Toolbar from './Toolbar';

export default {
    components: {Navigation, Toolbar},
    created() {

    }
}
</script>

<style>

</style>