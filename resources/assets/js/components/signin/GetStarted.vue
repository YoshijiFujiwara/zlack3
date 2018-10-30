<template>
    <get-started-layout>
        <v-list three-line>
            <v-list-tile>
                <div class="headline font-weight-bold">ワークスペースをスタート</div>
            </v-list-tile>

            <v-divider></v-divider>

            <div
                v-for="item in items"
                :key="item.title">
                <v-list-tile
                        @click.prevent="routeTo(item.route)"
                >
                    <v-list-tile-action>
                        <v-icon :color="item.iconClass">{{ item.icon }}</v-icon>
                    </v-list-tile-action>

                    <v-list-tile-content>
                        <v-list-tile-title v-text="item.title"></v-list-tile-title>
                        <v-list-tile-sub-title v-text="item.subTitle"></v-list-tile-sub-title>
                    </v-list-tile-content>

                    <v-list-tile-action>
                        <v-icon>arrow_forward_ios</v-icon>
                    </v-list-tile-action>
                </v-list-tile>

                <v-divider></v-divider>
            </div>

            <v-list-tile class="mt-4">
                <p>すでにこのワークスペースにサインインしています：</p>
            </v-list-tile>

            <!-- todo: あとで追加 -->
        </v-list>
    </get-started-layout>
</template>

<script>
export default {
    data: () => ({
        items: [
            { route: '/get-started/find', icon: 'search', iconClass: 'success', title: 'Zlackワークスペースを検索', subTitle: '既存のワークスペースに参加またはサインインします。'},
            { route: '/get-started/create', icon: 'add_box', iconClass: 'blue', title: 'ワークスペースを新規作成', subTitle: 'あなたの会社または組織でZlackを活用しましょう。'},
        ],
    }),
    methods: {
        routeTo(route) {
            this.$router.push(route);
        }
    }
}
</script>

<style>

</style>
