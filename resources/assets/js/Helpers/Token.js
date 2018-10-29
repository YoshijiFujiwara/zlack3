class Token {

    // トークンのペイロード
    payload(token) {
        const payload = token.split('.')[1];
        console.log(payload);
    }
}

export default Token = new Token();