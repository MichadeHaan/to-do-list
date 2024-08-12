document.getElementById('taskForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let taskInput = document.getElementById('taskInput').value;

    if (taskInput) {
        addTask(taskInput);
        document.getElementById('taskInput').value = '';
    }
});

// Laad alle taken bij het laden van de pagina
window.onload = loadTasks;

function loadTasks() {
    fetch('get_tasks.php')
        .then(response => response.json())
        .then(tasks => {
            tasks.forEach(task => {
                renderTask(task);
            });
        });
}

function addTask(description) {
    let taskData = {
        description: description
    };

    fetch('add_task.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(taskData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            renderTask(data.task);
        }
    });
}

function renderTask(task) {
    let taskList = document.getElementById('taskList');
    let li = document.createElement('li');
    li.setAttribute('data-id', task.id);
    li.innerHTML = `
        <p>${task.description}</p> 
        <input type="checkbox" ${task.completed ? 'checked' : ''} onchange="toggleTask(${task.id}, this)">
        <button id="del" onclick="deleteTask(${task.id})">Verwijderen</button>
    `;
    if (task.completed) {
        li.classList.add('completed');
    }
    taskList.appendChild(li);
}

function toggleTask(id, checkbox) {
    let completed = checkbox.checked;

    fetch('toggle_task.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id, completed: completed })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let li = document.querySelector(`li[data-id='${id}']`);
            if (completed) {
                li.classList.add('completed');
            } else {
                li.classList.remove('completed');
            }
        }
    });
}

function deleteTask(id) {
    fetch('delete_task.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let li = document.querySelector(`li[data-id='${id}']`);
            li.remove();
        }
    });
}