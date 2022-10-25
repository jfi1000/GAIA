import axios from "../../utils/axios";

function inicialState(){
    return{
        
            drawerLeft:true,
        
    };
}
export default{
    namespaced: true,
    state: inicialState(),
    mulations:{
        DrawerLeft(state){
            state.drawerLeft = !state.drawerLeft;
        }
    }
}