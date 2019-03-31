import React, {lazy, Suspense} from "react";
import {Route, Switch} from "react-router-dom";
import Loading from "./Components/Loading";

const HomeScreen = lazy(() => import(/* webpackPrefetch: true */ './Screens/HomeScreen'));

const Screen = Component => props => <Component {...props}/>;

export default () => (
    <Suspense fallback={<Loading>Loading...</Loading>}>
        <Switch>
            <Route exact path="/" component={Screen(HomeScreen)}/>
        </Switch>
    </Suspense>
);
