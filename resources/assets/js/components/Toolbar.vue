<template>
    <v-toolbar color="grey lighten-5" app absolute clipped-left>
        <!--<v-toolbar-side-icon @click.native="drawer = !drawer"></v-toolbar-side-icon>-->
        <span class="title ml-3 mr-5"><router-link to="/">zlack3&nbsp;</router-link></span>

        <v-spacer></v-spacer>
        <router-link to="/select-workspace" class="mr-1">ワークスペースを探す</router-link>
        <router-link to="/" class="mr-1">製品</router-link>
        <router-link to="/" class="mr-1">料金プラン</router-link>
        <router-link to="/" class="mr-1">サポート</router-link>

        <v-menu offset-y>
            <v-btn
                slot="activator"
                icon
            >
                <v-icon>more_horiz</v-icon>
            </v-btn>
            <v-list>
                <v-list-tile
                    v-for="(item, index) in items"
                    :key="index"
                    @click=""
                >
                    <v-list-tile-title><v-icon>{{ item.icon }}</v-icon> {{ item.title }}</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-menu>
    </v-toolbar>
</template>

<script>
export default {
    data: () => ({
        items: [
            {routeName: 'signin', icon: 'add_to_queue', title: '他のワークスペースにサインインする' },
            {routeName: 'create', icon: 'fiber_new', title: 'ワークスペースを新規作成する' },
        ]
    }),
    methods: {
        toggleMoreDisplay() {
            if (this.moreDisplay) {
                this.moreDisplay = false;
            } else {
                this.moreDisplay = true;
            }
        }
    }
}
</script>

<style>
#more_horize {

}
</style>
