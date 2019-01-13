const postDataObj = {
    method: 'statByNumber',
    sortOrder: 'DESC',
    srchType: 'dir',
    sltBonus: 0
};

const postData = Object.keys(postDataObj).map(key => key + '=' + postDataObj[key]).join('&');
console.log(postData);

function getData() {
    const url = 'https://www.dhlottery.co.kr/gameResult.do';
    fetch(url, {
        mode: 'no-cors',
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: new URLSearchParams(postData)
    }).then((response) => {
        response.text().then((text) => {
            console.log(text);
        });
    });
}

(() => {
    getData();
})();
