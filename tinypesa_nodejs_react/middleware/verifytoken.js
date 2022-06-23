const jwt = require('jsonwebtoken')
const dotenv = require('dotenv').config()

const verifyjwt = (req,res,next)=>{
    try {
        const {token} = req.headers
        if(!token){
            return res.json({status:403, message:'forbidden'})
        }
        verify = jwt.verify(token, process.env.JWT_SECRET)
        if(!verify){
            return res.json({status:'403', message:'forbidden'})
        }
        res.locals.id = verify.id
        //console.log(verify)
    } catch (error) {
        return res.json({status:'403', message:'forbidden'})
    }


    next()
}

module.exports = verifyjwt
