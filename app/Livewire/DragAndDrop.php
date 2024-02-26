<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DragAndDrop extends Component
{
    use LivewireAlert;

    public string $name = '';

    public array $tasks;

    public string $project = '1'; // should be dynamic
    public $selectedProject = '0';

    public function render()
    {
        $tasks = Task::filter($this->attributes)->orderBy('priority')->get()->toArray();
        $this->tasks = $tasks;
        return view('livewire.drag-and-drop', ['tasks' => $tasks]);
    }

    public function setProject()
    {
        $this->attributes['selected_project'] = $this->selectedProject;
    }

    public function save(): void
    {
        Project::find($this->project)
            ->tasks()
            ->create([
            'name' => $this->name
        ]);

        $this->alert('success', 'Task is created!');
        $this->name = '';
    }

    public function remove($id)
    {
        Task::find($id)->delete();
        $this->attributes['selected_project'] = $this->selectedProject;
        return redirect(request()->header('Referer'));
    }

    public function update($index): void
    {
        foreach ($this->tasks as $k => $val) {
            if ($val['id'] === $index) {
                Task::find($val['id'])->update(['name' => $val['name']]);
            }
        }

        $this->alert('success', 'Task is edited!');
    }

    public function updateTaskOrder($lists)
    {
        foreach ($lists as $task) {
            Task::find($task['value'])->update(['priority' => $task['order']]);
        }

        return redirect(request()->header('Referer'));
    }
}
