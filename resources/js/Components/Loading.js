import React from "react";

export default function Loading(props) {
    return (
        <div className="Loading">
            <div className="Loading__content">
                {props.children}
            </div>
        </div>
    );
}
