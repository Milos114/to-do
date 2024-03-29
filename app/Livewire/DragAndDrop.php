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
    public string $project = '1';
    public string $selectedProject = '0';

    public function render()
    {
        $this->tasks = Task::filter($this->attributes)->orderBy('priority')->get()->toArray();
        return view('livewire.drag-and-drop');
    }

    public function setProject(): void
    {
        $this->resetAttributes();
    }

    public function save(): void
    {
        Project::find($this->project)
            ->tasks()
            ->create([
                'name' => $this->name
            ]);

        $this->resetAttributes();
        $this->alert('success', 'Task is created!');
        $this->name = '';
    }

    public function remove($id): void
    {
        Task::find($id)->delete();
        $this->resetAttributes();
        $this->alert('success', 'Task is removed!');
    }

    public function update($index): void
    {
        foreach ($this->tasks as $val) {
            if ($val['id'] === $index) {
                Task::find($val['id'])->update(['name' => $val['name']]);
            }
        }

        $this->resetAttributes();
        $this->alert('success', 'Task is edited!');
    }

    public function updateTaskOrder($lists): void
    {
        foreach ($lists as $task) {
            Task::find($task['value'])->update(['priority' => $task['order']]);
        }

        $this->resetAttributes();
        $this->alert('success', 'Task is re-ordered!');
    }

    public function resetAttributes(): void
    {
        $this->attributes['selected_project'] = $this->selectedProject;
    }
}
