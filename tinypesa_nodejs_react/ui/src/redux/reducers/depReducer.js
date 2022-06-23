import { DEPOSIT_SUCCESS,
    DEPOSIT_FAIL } from "../actions/types";

const initialstate = {
    dep_data: []
}


export default function(state=initialstate, action){
    switch (action.type) {
        case DEPOSIT_SUCCESS:
            return {
                ...state,
                dep_data: action.payload
            }
        case DEPOSIT_FAIL:
            return {
            ...state,
            dep_data: []
            }
    
        default:
            return state
    }
}