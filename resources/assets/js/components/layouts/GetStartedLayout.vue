<template>
    <div>
        <v-toolbar>
            <v-spacer></v-spacer>
            <v-toolbar-title>Zlack</v-toolbar-title>
            <v-spacer></v-spacer>
        </v-toolbar>

        <v-layout>
            <v-flex xs5 class="mx-auto mt-5">
                <v-card>
                    <v-container
                        grid-list-lg
                    >
                        <slot></slot>
                    </v-container>
                </v-card>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    export default {

    }
</script>

<style>

</style>
