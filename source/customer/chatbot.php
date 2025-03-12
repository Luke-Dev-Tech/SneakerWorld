<div id="chatbot_div"
    class="block chatbot transition-all duration-100 ease-in-out p-[10px] box-border flex justify-center items-center rounded-lg"
    title="ServiceBot">
    <button class="chatbot-btn bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg hover:bg-cyan-700"
        id="chatbot_agent">
        <lord-icon src="https://cdn.lordicon.com/shcfcebj.json" trigger="hover"
            colors="primary:#ffffff,secondary:#ffffff" style="width:50px;height:50px"></lord-icon>
    </button>
    <!-- Conversation -->
    <div id="chat_section" class="hidden flex flex-col justify-center items-center gap-[10px]">
        <h1 class="text-xl text-white bebas-neue-regular ">Customer Support And Services</h1>
        <!-- Display Text -->
        <div class="bg-zinc-800 bg-opacity-50 box-border w-full max-h-[40vh] overflow-x-hidden hover:overflow-y-scroll p-[15px] flex flex-col gap-[10px] rounded-lg"
            id="display_convo">
            <!-- Display here  -->

        </div>
        <div class="w-full h-full flex justify-center items-center">
            <input type="text" id="small-input" placeholder="Enter your query"
                class="block w-[80%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <button type="button"
                class="box-border text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-md text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[5px]"
                id="send_to_chatbot">Send</button>

        </div>
        <span id="cancel_chat_section" class="cursor-pointer text-white">Cancel</span>
    </div>
</div>