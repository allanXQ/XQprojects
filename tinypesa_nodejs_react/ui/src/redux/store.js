import { createStore,applyMiddleware, compose } from "redux";
import { composeWithDevTools } from "redux-devtools-extension";
import {persistStore, persistReducer} from "redux-persist"
import storage from 'redux-persist/lib/storage'
import thunk from "redux-thunk";
import rootReducer from './reducers'

const initialState = {}
const persistConfig = {
    key:'persistkey',
    storage
}
const persistreducer = persistReducer(persistConfig, rootReducer)
const store = createStore(persistreducer,initialState, composeWithDevTools(applyMiddleware(thunk)))
const persistor = persistStore(store)

export default store
export {persistor}