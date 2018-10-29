class Token {

    // トークンの検証
    isValid(token) {
        const payload = this.payload(token);
        if (payload) {
            // todo: イケてない気がするので、後で直す
            // このURLでなければ、おかしい
            return payload.iss === "http://zlack3.test/api/auth/login";
        }
        return false;
    }


    // トークンのペイロード
    payload(token) {
        const payload = token.split('.')[1]; // 区切られた部分の真ん中だな
        console.log(this.decode(payload));
        return this.decode(payload);
    }

    // デコード
    decode(payload) {
        return JSON.parse(atob(payload));
    }
}

export default Token = new Token();