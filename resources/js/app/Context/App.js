import React, {createContext} from "react";

export const AppContext = createContext({});

export default Component => props => (
    <AppContext.Consumer>
        {context => <Component {...props} app={context}/>}
    </AppContext.Consumer>
);
