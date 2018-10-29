import Token from './Token';
import AppStorage from './AppStorage';

class User {
    // ログイン
    login(inputData) {
        axios.post('/api/auth/login', inputData)
            .then(res => this.loginAfterResponse(res, inputData))
            .catch(error => console.log(error.response.data));
    }

    // 受け取ったresponseから、ローカルストレージに保存する値を決め、ログインする
    loginAfterResponse(res, inputData) {
        const access_token = res.data.access_token;
        const user_email = inputData.email;
        const workspace_id = inputData.workspace_id;
        
        if (Token.isValid(access_token)) {
            // メールアドレスとワークスペースIDで一意
            AppStorage.store(user_email, workspace_id, access_token);
        }
    }

    // トークンを持っているか
    hasToken() {
        const storedToken = AppStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken);
        }
        return false;
    }

    // ログイン済み
    loggedIn() {
        return this.hasToken();
    }

    // ログアウト
    // ワークスペースごとにログアウトする機構が必要な気がする
    logout() {
        AppStorage.clear();
    }

    // ログインユーザーのemail
    email() {
        if (this.loggedIn) {
            return AppStorage.getUserEmail();
        }
    }

    // ログインユーザーのID
    id() {
        if (this.loggedIn) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }
}

export default User = new User();