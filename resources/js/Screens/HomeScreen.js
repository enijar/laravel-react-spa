import React from "react";
import AppContext from "../app/Decorators/AppContext";
import BaseScreen from "./BaseScreen";
import Screen from "../Components/Screen";

@AppContext
export default class HomeScreen extends BaseScreen {
    render() {
        return (
            <Screen name="Home">
                <h1>Hello world!</h1>
            </Screen>
        );
    }
}
