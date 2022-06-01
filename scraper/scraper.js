const puppeteer = require('puppeteer');
const xlsx = require('xlsx');

(async () => {

    const browser = await puppeteer.launch({headless:true});
    const page = await browser.newPage();
    url = 'https://www.jumia.co.ke/smartphones/oppo'
    await page.goto(url);

const getitems = await page.evaluate(()=>{

    const phone = document.querySelectorAll('.-paxs.row._no-g._4cl-3cm-shs article a')
    hrefs = []
    phone.forEach(item => {
        if(item.getAttribute('href') != null){
            hrefs.push(item.getAttribute('href'))
        }            
    });
    return hrefs
})
url_links = []
for(let data in getitems){
    url_links.push(url+getitems[data])
}
data_info = []

 for (let i = 0; i < url_links.length; i++) {
    url1 = url_links[i];
    await page.goto(`${url1}`, { waitUntil: 'domcontentloaded' });
    const getdata = await page.evaluate(()=>{
        all_data=[]
        const name = document.querySelector('.-fs20.-pts.-pbxs').innerText
        const price = document.querySelector('.-b.-ltr.-tal.-fs24').innerText
        const image_url = document.querySelector('#imgs a img').getAttribute('data-src')
        const description = document.querySelector('.markup.-mhm.-pvl.-oxa.-sc').innerText
        const reference = document.querySelector('.-hr.-pas .-m.-pbs').innerText
        all_data.push({
        'url': window.location.href,
        'name':name, 
        'price':price, 'image_url':image_url, 
        'description':description.replace(/(\r\n|\n|\r)/gm,""), 
        'reference':reference})         
        return all_data
    })

    getdata.forEach(data => {
        data_info.push(data)
    });

    
        
}
console.log(data_info)
const ws = xlsx.utils.json_to_sheet(data_info)
const wb = xlsx.utils.book_new()
xlsx.utils.book_append_sheet(wb, ws)
xlsx.writeFile(wb, 'jumia.xlsx')





await browser.close()
})();
