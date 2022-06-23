const router = require('express').Router()
const User = require('../models/users')
const verifytoken = require('../middleware/verifytoken')
const Deposit = require('../models/deposits')
const axios = require('axios')
const date= new Date
year = date.getFullYear()
month = date.getMonth()
day = date.getDate()
today = year+':'+ month + ':' + day
console.log(today)

router.post('/deposit',verifytoken, async (req,res)=>{//==
    const{phone,amount} = req.body
    if(!phone){
        return res.json({status:'400', message:'fill in all requires values'})
    }
    if(!amount){
        return res.json({status:'400', message:'fill in all requires values'})
    }

    const min_deposit = 100
    const max_deposit = 500
    if(parseInt(amount) < min_deposit){
        return res.json({status:'400', message:`minimum deposit is ${min_deposit}`})
    }

    if(parseInt(amount) > max_deposit){
        return res.json({status:'400', message:`maximum deposit is ${max_deposit}`})
    }

    try {
        const url = " https://tinypesa.com/api/v1/express/initialize";
        try { 
        await axios({
            method: 'post',
            url: url,
            data: {
                amount:amount,
                msisdn:phone,
            },
            headers:{
                Apikey: "your tinypesa apikey",
                "Content-Type": "application/json",
            },
          }).then((response)=>{
              if(response.status == 200){
                  res.json({status:200, message:'STK push sent.Input pin to complete transaction'})
              }
          })
        } catch (error) {
            console.log(error)
            res.json({status:400, message:'Request failed. Try again'})
        } 
        } catch (error) {
            //throw error
            res.json({status:'500', message:'deposit unsuccessful'})
        }
    })    

router.post("/tinypesa/webhook",async (req, res) => {
    //console.log(req.body.Body) // Call your action on the request here
    const metadata = req.body.Body.stkCallback.CallbackMetadata
    const stkcallback = req.body.Body.stkCallback
    try {
        if(stkcallback.ResultCode == 0){
            console.log(metadata)
            const amount = metadata.Item[0]['Value']
            const mpesa_ref = metadata.Item[1]['Value']
            const transaction_date = metadata.Item[2]['Value']
            console.log( amount, mpesa_ref,transaction_date,'metadataaaaaaaaaaa')
            const phone = metadata.Item[3]['Value']
            const phonee = phone.toString().slice(3)
            const create_deposit = await Deposit.create({
            phone:phonee,
            amount,
            mpesa_ref,
            created:transaction_date
            })
            if(create_deposit){
                console.log('createeeeeeeeeeeeeeeeee')
            }
            if(!create_deposit){
                console.log(create_deposit)
                return res.json({status:'400', message:'deposit failed'})
                }
                //const phon = metadata.Item[4]['Value']
                const phone_number = phonee//phon.toString().slice(3)
                const update_amount = metadata.Item[0]['Value']
                //const phone_number = '0' + phone_no
                console.log(phone_number)
                const user = await User.findOne({phone:phone_number}).lean()
                if(!user){
                    console.log('user not found')
                    return(res.json({status:'400', message:'deposit failed'}))
                }
                console.log(user)
                const curr_balance = user.balance
                const user_update = await User.updateOne(
                    {phone:phone_number},
                    {
                        $set:{balance:curr_balance+update_amount}
                    }
                )
        }        
        } catch (error) {
        console.log(error)
        return(res.json({status:'400', message:'deposit failed'}))

    }   
})

module.exports = router