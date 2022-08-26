<div
    x-data="{
        messages: [],
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        },
    }"
    @notify.window="let message = $event.detail; messages.push(message); setTimeout(() => { remove(message) }, 2500)"
    class="fixed inset-0 z-50 flex flex-col items-end justify-start px-4 py-6 space-y-4 pointer-events-none sm:p-6"
>
    <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
        <div
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="w-full max-w-sm rounded-lg shadow-lg pointer-events-auto overflow-hidden">
            <div
                :class="{
                    'bg-primary border-primary': message.type === 'success',
                    'bg-error border-error': message.type === 'error',
                    'bg-info border-info': message.type === 'info',
                    'bg-warning border-warning': message.type === 'warning',
                }"
                class="w-full max-w-sm p-4 border-l-4 overflow-hidden text-white pointer-events-auto"
            >
                <div class="flex items-start justify-between space-x-2">
                    <div>
                        <h3 x-text="message.title" class="flex-grow font-semibold"></h3>
                        <p x-text="message.message" class="text-sm font-normal text-white break-all"></p>
                    </div>
                    <div class="flex-shrink-0">
                        <button @click="remove(message)"
                                :class="{
                                    'bg-primary border-primary': message.type === 'success',
                                    'bg-error border-error': message.type === 'error',
                                    'bg-info border-info': message.type === 'info',
                                    'bg-warning border-warning': message.type === 'warning',
                                }"  class="inline-flex text-white focus:outline-none">
                            <svg class="stroke-current w-4 h-4" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M18 6 6 18M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
