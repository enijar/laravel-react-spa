import React, {Component} from "react";
import Routes from "../routes";
import {withRouter} from "react-router-dom";
import {AppContext} from "../app/Context/App";
import {DEFAULT_APP_CONTEXT} from "../app/consts";

@withRouter
export default class App extends Component {
    state = {
        ...JSON.parse(JSON.stringify(DEFAULT_APP_CONTEXT)),
        errors: [],
    };

    getContext() {
        return {
            ...this.state,
        };
    }

    render() {
        return (
            <AppContext.Provider value={this.getContext()}>
                <div className={`App`}>
                    <Routes/>
                </div>
            </AppContext.Provider>
        );
    }
}
