function whatsappContact({
  brandName: d_brandName = "",
  buttonName: d_buttonName = "Chat with us",
  brandStatusText: d_StatusText = "",
  welcomeMessage: d_welcomeMsg = "",
  phoneNumber: d_phoneNumber = "",
  brandImageUrl: d_ImageUrl = "",
  callToAction: d_ctaText = "Start Chat",
  buttonSize: d_buttonSize = "large",
  prefillMessages: d_prefillMessages = "",
  replyOptions: d_replyOptions = "",
  buttonPosition: d_buttonPosition = "bottom-right",
}) {
  document.addEventListener("DOMContentLoaded", function () {
    const optionsArray = d_replyOptions
      .split(",")
      .map((option) => option.trim());

    // Set default message with the first reply option if available
    const defaultReply = optionsArray.length > 0 ? optionsArray[0] : "";
    const d_prefillMessagesDefault = d_prefillMessages;
    const d_prefilltextDefault = d_prefillMessages + defaultReply;
    const decodedImageUrl = decodeURIComponent(d_ImageUrl);

    const widgetTemplate = `
    <style>
    .epos-whatsapp-wa {
  padding: 0 !important;
  position: fixed;
}
.epos-whatsapp-wa.wapp-chatCta {
  background: #26d466 !important;
  border: #26d466 !important;
  border-radius: 100% !important;
  bottom: 75px;
  height: 45px;
  right: 25px;
  transition: all 0.2s linear;
  width: 45px;
  z-index: 20;
}
.epos-whatsapp-wa.wapp-chatCta:hover {
  transform: translateY(-10%);
}
@media (min-width: 768px) {
  .epos-whatsapp-wa.wapp-chatCta {
    bottom: 100px;
    height: 65px;
    width: 65px;
  }
}
@media (max-width: 768px) {
  .epos-whatsapp-wa.wapp-chatCta {
    width: 45px;
  }
}
.epos-whatsapp-wa svg {
  fill: #fff;
  height: 55%;
  width: 55%;
}
.wapp-widgetGrp {
  bottom: 80px;
  position: fixed;
  right: 20px;
  z-index: -1;
}
.wapp-widgetGrp.active {
  z-index: 999;
}
@media (min-width: 768px) {
  .wapp-widgetGrp {
    bottom: 70px;
    right: 100px;
  }
}
.wapp-chatCta {
  align-items: center;
  background-color: #26d466 !important;
  border: 1px solid #26d466 !important;
  border-radius: 8px !important;
  color: #fff;
  cursor: pointer;
  display: flex;
  font: 18px/1 var(--primaryfont-semibold);
  justify-content: center;
  transition: all 0.3s ease-out;
  width: 100%;
}
.wapp-preview {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 62.32px 13.68px rgba(87, 87, 87, 0.11);
  max-width: 320px;
  transform-origin: bottom right;
  transition: opacity 0.2s ease, transform, 0.2s ease;
}
.wapp-preview.is-hidden {
  opacity: 0;
  transform: scale(0.4);
  visibility: hidden;
}
.zippy-waTop {
  align-items: flex-start;
  background: #056055;
  border-radius: 10px 10px 0 0;
  color: #fff;
  display: flex;
  justify-content: space-between;
  padding: 12px;
}
.zippy-waTop .wapp-profileSec {
  align-items: center;
  display: flex;
  width: calc(100% - 25px);
}
.zippy-waTop .wapp-profileLft {
  background-color: #fff;
  border-radius: 50%;
  height: 35px;
  margin-right: 15px;
  overflow: hidden;
  position: relative;
  width: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.zippy-waTop .wapp-profileLft img {
  content: "";
  display: inline-block;
  height: auto;
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 85%;
}
.zippy-waTop .wapp-profileRht {
  display: flex;
  flex-direction: column;
  width: calc(100% - 67px);
}
.zippy-waTop .wapp-name {
  font-size: 14px;
  line-height: 1;
  margin-bottom: 10px;
}
.zippy-waTop .wapp-status {
  font-size: 12px;
  line-height: 1;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.zippy-waTop .wapp-widgetClose {
  cursor: pointer;
  display: inline-block;
  font-size: 22px;
  height: 25px;
  width: 25px;
}
.zippy-waTop .wapp-widgetClose i {
  pointer-events: none;
}
.wapp-msgSection {
  background: #e8ded4
    url(https://oweb.zohowebstatic.com/sites/oweb/images/zohobigin/images/wapp-background.jpg);
  background-size: cover;
  max-height: 200px;
  overflow: auto;
  padding: 20px 20px 15px;
}
.wapp-msgSection .wapp-msgLft {
  background-color: #fff;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  margin-bottom: 15px;
  padding: 12px;
  width: 75%;
}
.wapp-msgSection .wapp-msgdefault {
  display: block;
  font-size: 14px;
  line-height: 1;
  padding-bottom: 10px;
}
.wapp-msgSection .wapp-tagGroups {
  align-items: flex-start;
  display: flex;
  flex-wrap: wrap;
  margin-top: 15px;
}
.wapp-msgSection .wapp-msgRht {
  display: flex;
  justify-content: flex-end;
  width: 100%;
}
.wapp-msgSection .wapp-msgRht .wapp-msgRhtInner {
  align-items: flex-start;
  background-color: #fff;
  border-radius: 10px;
  padding: 12px;
  width: 75%;
}
.wapp-msgSection .wapp-msgRht .wapp-smarttag-btn {
  background: #fff !important;
  border: 1px solid #26d466;
  border-radius: 23px !important;
  color: #000 !important;
  cursor: pointer;
  display: inline-block;
  font-size: 12px !important;
  margin: 0 10px 8px 0;
  outline: 0;
  padding: 4px 12px !important;
  transition: all 0.2s ease-out;
}
.wapp-msgSection .wapp-msgRht .wapp-smarttag-btn.active,
.wapp-msgSection .wapp-msgRht .wapp-smarttag-btn:hover {
  background: #dcf7c5 !important;
  border: 1px solid #26d466;
}
.wapp-dynamicMsg,
.wapp-msgCont {
  display: block;
  word-wrap: break-word;
  font-size: 13px;
  line-height: 1;
}
.wapp-dynamicMsg .dynamicMsg {
  display: block;
  margin-top: 5px;
}
.wapp-btnSection {
  background: #fff;
  border-radius: 0 0 10px 10px;
  padding: 12px;
}
.wapp-btnSection .wapp-chatCta {
  font-size: 14px;
  margin: 0;
  padding: 12px;
}
.wapp-chatCta.medium {
  padding: 12px 30px;
}
.wapp-chatCta.small {
  padding: 9px 30px;
}
.wapp-icon {
  background: url(https://oweb.zohowebstatic.com/sites/oweb/images/zohobigin/images/whatsapp-free-widget-tool-svg-sprite.svg)
    no-repeat -41px -9px;
  display: inline-block;
  height: 25px;
  margin-right: 10px;
  width: 25px;
}
.wapp-signature {
  align-items: center;
  color: #000;
  display: flex;
  font: 15px/1.1 var(--primaryfont-semibold);
  padding-top: 10px;
}
.wapp-btnSection .wapp-signature {
  justify-content: center;
}
.wapp-signature a {
  color: #0090eb;
}
.wapp-poweredIcon {
  background: url(https://oweb.zohowebstatic.com/sites/oweb/images/zohobigin/images/whatsapp-free-widget-tool-svg-sprite.svg)
    no-repeat -114px -12px;
  display: inline-block;
  height: 18px;
  margin-right: 5px;
  width: 13px;
}
.wapp-float-btn {
  margin: 40px 0 10px;
  transition: all 0.3s ease;
}
.bottom-left,
.bottom-right {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  transition: all 0.3s ease;
}
.bottom-left {
  align-items: flex-start;
}
@media only screen and (max-width: 450px) {
  .wapp-txtImg {
    font-size: 22px;
  }
  .wapp-name {
    font-size: 18px;
  }
  .wapp-dynamicMsg,
  .wapp-msgCont {
    font-size: 15px;
  }
  .wapp-preview {
    margin: 0 auto;
  }
}

    </style>
    <button class="wapp-chatCta epos-whatsapp-wa">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 241.19"><path class="whatsapp-icon" d="M205,35.05A118.61,118.61,0,0,0,120.46,0C54.6,0,1,53.61,1,119.51a119.5,119.5,0,0,0,16,59.74L0,241.19l63.36-16.63a119.43,119.43,0,0,0,57.08,14.57h0A119.54,119.54,0,0,0,205,35.07v0ZM120.5,219A99.18,99.18,0,0,1,69.91,205.1l-3.64-2.17-37.6,9.85,10-36.65-2.35-3.76A99.37,99.37,0,0,1,190.79,49.27,99.43,99.43,0,0,1,120.49,219ZM175,144.54c-3-1.51-17.67-8.71-20.39-9.71s-4.72-1.51-6.75,1.51-7.72,9.71-9.46,11.72-3.49,2.27-6.45.76-12.63-4.66-24-14.84A91.1,91.1,0,0,1,91.25,113.3c-1.75-3-.19-4.61,1.33-6.07s3-3.48,4.47-5.23a19.65,19.65,0,0,0,3-5,5.51,5.51,0,0,0-.24-5.23C99,90.27,93,75.57,90.6,69.58s-4.89-5-6.73-5.14-3.73-.09-5.7-.09a11,11,0,0,0-8,3.73C67.48,71.05,59.75,78.3,59.75,93s10.69,28.88,12.19,30.9S93,156.07,123,169c7.12,3.06,12.68,4.9,17,6.32a41.18,41.18,0,0,0,18.8,1.17c5.74-.84,17.66-7.21,20.17-14.18s2.5-13,1.75-14.19-2.69-2.06-5.7-3.59l0,0Z"></path></svg>
          </button>
      <div class="wapp-widgetGrp">
        <div class="wapp-preview is-hidden">
          <div class="zippy-waTop">
            <div class="wapp-profileSec">
              <span class="wapp-profileLft">
              <svg width="31" height="9" viewBox="0 0 31 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.31911 6.32134L4.40085 7.23958L2.50511 5.34384L2.29034 5.12907L1.60163 4.44043L4.3934 1.64864L5.30426 2.5595L3.43075 4.43301L4.40821 5.41049L7.21478 2.60391L4.92654 0.31572C4.628 0.017156 4.14394 0.017156 3.8454 0.31572L0.283493 3.87761C-0.0150706 4.17622 -0.0150706 4.66023 0.283493 4.95879L3.8454 8.52066C4.14397 8.8192 4.62803 8.81922 4.92654 8.52066L8.48853 4.95879C8.78709 4.66021 8.78709 4.17619 8.48853 3.87761L8.12559 3.51477L5.31911 6.32134Z" fill="#80C34D"/>
<path d="M13.4491 1.47186V1.4707H10.7049H10.1114H8.72559V8.23599H10.7049V5.74944H13.4491V5.74828C14.6 5.71306 15.5223 4.76925 15.5223 3.61005C15.5223 2.45089 14.6 1.50713 13.4491 1.47186ZM13.4853 3.88945V3.88989H10.6683V3.4343H13.4853V3.43471C13.605 3.44151 13.7 3.54076 13.7 3.66211C13.7 3.7835 13.605 3.88268 13.4853 3.88945Z" fill="#1B459B"/>
<path d="M19.8581 1.4707H18.8108C17.2491 1.4707 15.9832 2.73668 15.9832 4.29833V5.40844C15.9832 6.97006 17.2491 8.23602 18.8108 8.23602H19.8581C21.4196 8.23602 22.6856 6.97006 22.6856 5.40844V4.29833C22.6856 2.73668 21.4196 1.4707 19.8581 1.4707ZM20.7796 5.14135C20.7796 5.8065 20.2405 6.34574 19.5753 6.34574H19.104C18.4389 6.34574 17.8997 5.8065 17.8997 5.14135V4.56012C17.8997 3.89502 18.4389 3.35573 19.104 3.35573H19.5753C20.2405 3.35573 20.7796 3.89499 20.7796 4.56012V5.14135Z" fill="#1B459B"/>
<path d="M27.9076 3.84794H27.566H26.0016C25.8757 3.84794 25.7738 3.74486 25.7738 3.61759C25.7738 3.49037 25.8757 3.3872 26.0016 3.3872H27.7688H29.955V1.4707H25.4256C24.2371 1.4707 23.2735 2.43423 23.2735 3.62284C23.2735 4.81141 24.2425 5.76707 25.431 5.76707C25.5029 5.76707 25.7684 5.76449 25.7684 5.76449L25.7683 5.76499H27.6566C27.7824 5.76499 27.8844 5.86817 27.8844 5.99539C27.8844 6.12266 27.7635 6.22576 27.6566 6.22576C27.5617 6.22576 26.0939 6.23362 25.7683 6.23541L25.7684 6.2357H23.2734V8.15222H27.8028V8.14966C27.8375 8.15123 27.8724 8.15222 27.9076 8.15222C29.0961 8.15222 30.0596 7.18867 30.0596 6.00006C30.0597 4.81151 29.0962 3.84794 27.9076 3.84794Z" fill="#1B459B"/>
</svg>

              </span>
              <span class="wapp-profileRht">
                <span class="wapp-name">${d_brandName}</span>
                <span class="wapp-status">${d_StatusText}</span>
              </span>
            </div>
            <span class="wapp-widgetClose">
             <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.0143 1L1.01428 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M1.01428 1L13.0143 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
             </svg>

             </span>
          </div>
          <div class="wapp-msgSection">
            <div class="wapp-msgLft">
              <span class="wapp-msgdefault">${d_brandName}</span>
              <span class="wapp-msgCont">${d_welcomeMsg}</span>
            </div>
            <div class="wapp-msgRht">
              <div class="wapp-msgRhtInner">
                <span class="wapp-dynamicMsg">${d_prefillMessagesDefault} <span class="dynamicMsg">${defaultReply}</span></span>
                <div class="wapp-tagGroups">
                  ${optionsArray
                    .map(
                      (option, key) => `
                    <span class="wapp-smarttags">
                      <button class="wapp-smarttag-btn ${
                        key == 0 ? "active" : ""
                      }" data-tags="${option}" value="${option}">${option}</button>
                    </span>`
                    )
                    .join("")}
                </div>
              </div>
            </div>
          </div>
          <div class="wapp-btnSection">
            <a class="whatsapp-link" style="text-decoration:none;width:100%"
              href="https://api.whatsapp.com/send?phone=${d_phoneNumber}&text=${encodeURIComponent(
      d_prefilltextDefault
    )}"
              rel="noopener noreferrer" target="_blank">
              <button class="wapp-chatCta"><span class="wapp-icon"></span><span class="wapp-ctaTxt">${d_ctaText}</span></button>
            </a>
          </div>
        </div>
        <div class="wapp-float-btn ${d_buttonPosition}">
          
        </div>
      </div>`;

    // Append the widget to the body
    document.body.insertAdjacentHTML("beforeend", widgetTemplate);

    const wrapper = document.querySelector(".wapp-widgetGrp");
    const previewSec = document.querySelector(".wapp-preview");
    const floatBtn = document.querySelector(".epos-whatsapp-wa");
    const closeBtn = document.querySelector(".wapp-widgetClose");
    const tagGroupsDiv = document.querySelector(".wapp-tagGroups");
    const dynamicMsgElement = document.querySelector(".dynamicMsg");
    const whatsappLink = document.querySelector(".whatsapp-link");
    // Toggle chat preview
    floatBtn.addEventListener("click", () => {
      previewSec.classList.toggle("is-hidden");
      wrapper.classList.toggle("active");
    });

    closeBtn.addEventListener("click", () => {
      previewSec.classList.add("is-hidden");
      wrapper.classList.remove("active");
    });

    // Event delegation for dynamically generated buttons
    tagGroupsDiv.addEventListener("click", (e) => {
      if (e.target.classList.contains("wapp-smarttag-btn")) {
        document
          .querySelectorAll(".wapp-smarttag-btn")
          .forEach((tag) => tag.classList.remove("active"));
        e.target.classList.add("active");

        const selectedOption = e.target.value;
        dynamicMsgElement.innerText = `${selectedOption}`;
        const updatedPrefillMsg = `${d_prefillMessages} ${selectedOption}`;
        whatsappLink.href = `https://api.whatsapp.com/send?phone=${d_phoneNumber}&text=${encodeURIComponent(
          updatedPrefillMsg
        )}`;
      }
    });
  });
}
whatsappContact({
  buttonName: "Start Chat",
  brandImageUrl:
    "https://www.epos.com.sg/wp-content/uploads/2020/01/pos-system.svg",
  brandName: "EPOS POS System",
  brandStatusText: "Typically replies within a day",
  buttonPosition: "bottom-right",
  phoneNumber: "6584821888",
  welcomeMessage: "Hi there! 👋 How can I help you?",
  prefillMessages: "I am looking for: ",
  replyOptions: "F&B POS System,Retail POS System,Others,Tech Support",
});
