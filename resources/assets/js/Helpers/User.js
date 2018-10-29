import Token from './Token';
import AppStorage from './AppStorage';

class User {
    login(data) {
        console.log(data);
        axios.post('/api/auth/login', data)
            .then(res => {
                Token.payload(res.data);
            })
            .catch(error => console.log(error.response.data));
    }
}

export default User = new User();