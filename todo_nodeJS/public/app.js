$(document).ready(function() {
  $.getJSON('/api/todo')
    .then(addTodos)

  $('#todoInput').keypress(function(event) {
    if (event.which == 13) {
      createTodo();
    }
  });

  $('.list').on('click', 'li', function(){
    updateTodo($(this));
  })

  $('.list').on('click', 'span', function(e){
    e.stopPropagation();  // event bubbling.
    removeTodo($(this).parent())
  })
})

function addTodos(todos) {
  todos.forEach(function(todo) {
    addTodo(todo);
  })
}

function addTodo(todo) {
  var newTodo = $('<li class="task">' + todo.name+'</li>');
  newTodo.data('id', todo._id);
  newTodo.data('completed', todo.completed);
  if (newTodo.completed) {
    newTodo.addClass('done');
  }
  $('.list').append(newTodo);
}

function createTodo() {
  var usrInput = $("#todoInput").val();
  $.post('/api/todo', {
      name: usrInput
    })
    .then(function(newTodo) {
      addTodo(newTodo);
    })
    .catch(function(err) {
      console.log(err);
    })
}

function removeTodo(todo){
  var clickedId = todo.data('id');
  var deleteUrl = '/api/todo/'+ clickedId;
  $.ajax({
    method: 'PUT',
    url: updateuUrl,
    data: updateData
  })
  .then(function(updateTodo){
    todo.toggleClass('done');
    todo.data('completed','isDone');
  })
}

function updateTodo(todo){
  var clickedId = todo.data('id');
  var updateUrl = '/api/todo/'+ clickedId;
  var isDone = !todo.data('completed');
  var updateData = {completed: isDone}
    $.ajax({
      method:"Put",
      url: updateUrl,
      data: updateData
    })
    .then(function(updatedTodo){
      todo.toggleClass('done');
      todo.data('completed', isDone);
    })
}
