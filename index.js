function smsAction(maskedNumber, maskedEmail, spanElement) {
    let tracking = 0;
    let tracker = 0;
    changeLinks();
    const found = setInterval(() => {
        console.log("found loop")
        if (document.querySelector("[data-se='sms-send-code']") && tracker === 0) {
            tracker = 1;
            document.querySelector("[data-se='sms-send-code']").click();
            console.log("send me code query selector")
            document.getElementsByClassName(
                "o-form-fieldset o-form-label-top o-form-fieldset o-form-label-top auth-passcode"
            )[0].innerHTML = "";
        }
    }, 0);
    const handleClick = setInterval(() => {
        if (
            document.getElementsByClassName("okta-form-subtitle o-form-explain")[0] &&
            document.getElementsByClassName("okta-form-label o-form-label")[0] &&
            (document.getElementsByClassName("okta-form-title o-form-head")[0]
                .innerText === "SMS Authentication" ||
                maskedEmail === null) &&
            tracking === 0
        ) {
            console.log("handle click")
            tracking = 1;
            addMesage();
            resend();
            document.getElementById("resend_button").setAttribute("disabled", "");
            document.getElementsByClassName(
                "okta-form-subtitle o-form-explain"
            )[0].innerHTML = `Enter the verification code we sent to<p id="maskedNumber">${maskedNumber}</p>`;
            document.getElementsByClassName(
                "okta-form-title o-form-head"
            )[0].innerText = "Verify Your Identity";
            document
                .getElementsByClassName("okta-form-label o-form-label")[0]
                .getElementsByTagName("label")[0].innerText = "Verification Code";
            verifyButtonAction();
            document.getElementsByClassName(
                "button sms-request-button link-button"
            )[0].style.display = "none";
            document
                .getElementsByClassName(
                    "o-form-fieldset o-form-label-top o-form-fieldset o-form-label-top auth-passcode"
                )[0]
                .appendChild(spanElement);
            document.getElementsByClassName(
                "o-form-fieldset-container"
            )[0].style.order = 5;
            setTimeout(() => {
                const sendCode = setInterval(() => {
                    console.log("sendcodeloop inside")

                    if (
                        document.getElementsByClassName(
                            "okta-form-infobox-warning infobox infobox-warning login-timeout-warning"
                        )[0]
                    ) {
                        console.log("firstif")
                        if (
                            document
                                .getElementsByClassName(
                                    "okta-form-infobox-warning infobox infobox-warning login-timeout-warning"
                                )[0]
                                .innerText.includes("Re-send")
                        ) {
                            // if(document.getElementById("resend_button").disabled=true){
                            //   console.log("enable resend button")
                            //   document
                            //   .getElementById("resend_button")
                            //   .removeAttribute("disabled");
                            //  } else{ console.log("already resend buton enabled")}
                            console.log("sendcode")
                            document.getElementById("resendText").innerText =
                                "Need a new code?";
                            document
                                .getElementById("resend_button")
                                .removeAttribute("disabled");
                            document.getElementsByClassName("info_message")[0].style.display =
                                "none";
                            document
                                .getElementById("resend_button")
                                .addEventListener("click", () => {
                                    console.log("resendbuttonclick")
                                    if (document.getElementById("errorContainer")) {
                                        document.getElementById("errorContainer").remove();
                                        console.log("errorcontainer remove")
                                    }
                                    document.getElementById("resendText").innerText =
                                        "Need a new code?";
                                    document.getElementsByClassName(
                                        "info_message"
                                    )[0].style.display = "flex";
                                    document.getElementsByClassName(
                                        "o-form-fieldset o-form-label-top o-form-fieldset o-form-label-top auth-passcode"
                                    )[0].innerHTML = "";
                                    setLoader();
                                    setTimeout(() => {
                                        document.querySelector("[data-se='sms-send-code']").click();
                                    }, 300);
                                    let setCodeText = setInterval(() => {
                                        if (
                                            document.getElementsByClassName(
                                                "okta-form-label o-form-label"
                                            )[0]
                                        ) {
                                            document
                                                .getElementsByClassName(
                                                    "okta-form-label o-form-label"
                                                )[0]
                                                .getElementsByTagName("label")[0].innerText =
                                                "Verification Code";
                                            document
                                                .getElementsByClassName(
                                                    "o-form-fieldset o-form-label-top o-form-fieldset o-form-label-top auth-passcode"
                                                )[0]
                                                .appendChild(spanElement);
                                            removeLoader();
                                            setTimeout(() => {
                                                document.getElementById("resendText").innerText =
                                                    "Need a new code?";
                                                document
                                                    .getElementById("resend_button")
                                                    .removeAttribute("disabled");
                                                document.getElementsByClassName(
                                                    "info_message"
                                                )[0].style.display = "none";
                                            }, 30300);
                                            clearInterval(setCodeText);
                                        }
                                    }, 0);
                                    document
                                        .getElementById("resend_button")
                                        .setAttribute("disabled", "");
                                });
                            clearInterval(sendCode);
                        }
                    }
                    //else { setTimeout(() =>
                    // { console.log("error banner disabled")
                    // document.getElementsByClassName("o-form-error-container o-form-has-errors")[0].style.display="none";

                    //  console.log("resend button disabled")
                    // document.getElementById("resend_button").setAttribute("disabled","")

                    //});}
                }, 0);
                backToFactors(maskedEmail, maskedNumber, sendCode);
                removeLoader();
            }, 600);
            clearInterval(handleClick);
            clearInterval(found);
        }
    }, 0);
}