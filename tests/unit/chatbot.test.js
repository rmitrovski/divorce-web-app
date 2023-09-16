global.document={
querySelector: jest.fn(),
};

global.localStorage={
getItem: jest.fn(),
setItem: jest.fn(),
removeItemItem: jest.fn(),
};

global.fetch= jest.fn();

describe("chat functions", ()=>{
beforeEach(()=>{
global.document.querySelector.mockClear();
global.localStorage.getItem.mockClear();
global.localStorage.setItem.mockClear();
global.localStorage.removeItemItemItem.mockClear();
global.fetch.mockClear();
});




it("loads data from local storage ",()=>{
  global.localStorage.getItem.mockReturnValueOnce("light_mode");
  loadDataFromLocalstorage();
  expect(localStorage.getItem).toHaveBeenCalledWith("themeColor");
  expect(localStorage.getItem).toHaveBeenCalledWith("all-chats");


});



it("creates chat elements ",()=>{
  const result = createChatElement("<p>Test</p>", "test-class");
  expect(result.classList.contains("chat")).toBeTruthy();
  expect(result.classList.contains("test-class")).toBeTruthy();
  expect(result.innerHTML).toBe("<p>Test</p>");

});

it("handles ongoing chat  ",()=>{

chatInput={value: "Test message", style:{}};
chatContainer= {
  appendChild: jest.fn(), querySelector:jest.fn(), scrollTo:jest.fn()
};
handleOutgoingChat();
expect(chatInput.value).toBe("");
expect(chatContainer.appendChild).toBeCalled();
});


});


  


