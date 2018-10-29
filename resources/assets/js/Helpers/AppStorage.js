class AppStorage {

    // ローカルストレージにトークンを保存
    storeToken(token) {
        localStorage.setItem('token', token);
    }

    // ユーザー情報をローカルストレージに保存する
    storeUser(user) {
        localStorage.setItem('user', user);
    }

    // ローカルストレージに保存
    store(user, token) {
        this.storeToken(token);
        this.storeUser(user);
    }

    // ローカルストレージ内を消去
    clear() {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }

    // ローカルストレージからトークンとユーザーを取得
    getToken() {
        return localStorage.getItem('token');
    }
    getUser() {
        return localStorage.getItem('user');
    }
}

export default AppStorage = new AppStorage();