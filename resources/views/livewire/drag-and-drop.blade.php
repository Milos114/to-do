<div>
    <h1 class="font-medium text-gray-500 dark:text-gray-400">Type task name end press enter</h1>

    <form wire:submit="save">
        <div
            class="rounded-lg text-gray-500 dark:text-gray-400 relative flex w-full max-w-[24rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <nav class="flex min-w-[240px] flex-row gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
                <div role="button"
                     class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                    <label htmlFor="horizontal-list-react" class="flex items-center w-full px-3 py-2 cursor-pointer">
                        <div class="grid mr-3 place-items-center">
                            <div class="inline-flex items-center">
                                <label class="relative flex items-center p-0 rounded-full cursor-pointer"
                                       htmlFor="horizontal-list-react">
                                    <input wire:model="project" value="1" id="horizontal-list-react" type="radio"
                                           class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:before:bg-gray-900 hover:before:opacity-0"/>
                                    <span
                                        class="absolute text-gray-900 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                  <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                </svg>
              </span>
                                </label>
                            </div>
                        </div>
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-400">
                            Project ALPHA
                        </p>
                    </label>
                </div>
                <div role="button"
                     class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                    <label htmlFor="horizontal-list-vue" class="flex items-center w-full px-3 py-2 cursor-pointer">
                        <div class="grid mr-3 place-items-center">
                            <div class="inline-flex items-center">
                                <label class="relative flex items-center p-0 rounded-full cursor-pointer"
                                       htmlFor="horizontal-list-vue">
                                    <input wire:model="project" value="2" id="horizontal-list-vue" type="radio"
                                           class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:before:bg-gray-900 hover:before:opacity-0"/>
                                    <span
                                        class="absolute text-gray-900 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                  <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                </svg>
              </span>
                </label>
                        </div>
                    </div>
                    <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-400">
                        Project BETA
                    </p>
                </label>
                </div>
            </nav>
        </div>

        <div class="mb-16 text-center">
            <input wire:model="name" type="text" id="default-input" placeholder="Create task"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
    </form>

    @if(count($tasks))
        <table class="mt-16 w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Task name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody wire:sortable="updateTaskOrder">
            @foreach($tasks as $k => $task)
                <tr wire:sortable.item="{{$task['id']}}" wire:key="task-{{$k}}"
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input wire:model="tasks.{{$k}}.name" wire:change="update({{$task['id']}})" type="text"
                               value="{{$task['name']}}" id="first_name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="John" required/>
                    </th>
                    <td class="px-6 py-4">
                        <a wire:click="remove({{$task['id']}})" href="#"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <div class="mt-16">
        <select wire:model="selectedProject" wire:change="setProject" id="dropdown" name="dropdown"
                class="rounded-lg mt-8">
            <option selected value="0">Chose project</option>
            <option value="1">Alpha</option>
            <option value="2">Beta</option>
        </select>
    </div>
</div>
