class AppStorage {

    // ローカルストレージにトークンを保存
    storeToken(token) {
        localStorage.setItem('token', token);
    }

    // ユーザー情報をローカルストレージに保存する
    storeUserEmail(user_email) {
        localStorage.setItem('user_email', user_email);
    }

    // ワークスペースIDを保存する
    storeWorkspaceId(workspace_id) {
        localStorage.setItem('workspace_id', workspace_id);
    }

    // ローカルストレージに保存
    store(user_email, workspace_id, token) {
        this.storeUserEmail(user_email);
        this.storeWorkspaceId(workspace_id);
        this.storeToken(token);
    }

    // ローカルストレージ内を消去
    clear() {
        localStorage.removeItem('token');
        localStorage.removeItem('user_email');
        localStorage.removeItem('workspace_id');
    }

    // ローカルストレージからトークンとユーザーを取得
    getToken() {
        return localStorage.getItem('token');
    }
    getUserEmail() {
        return localStorage.getItem('user_email');
    }
}

export default AppStorage = new AppStorage();