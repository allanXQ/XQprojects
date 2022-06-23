import { combineReducers } from "redux";

import depReducer from "./depReducer";


export default combineReducers({
    depData: depReducer,
})