import Token from './Token';
import AppStorage from './AppStorage';

class User {
    login(inputData) {
        axios.post('/api/auth/login', inputData)
            .then(res => this.responseAfterLogin(res, inputData))
            .catch(error => console.log(error.response.data));
    }

    responseAfterLogin(res, inputData) {
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

    email() {
        if (this.loggedIn) {
            return AppStorage.getUserEmail();
        }
    }

    id() {
        if (this.loggedIn) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }

}

export default User = new User();