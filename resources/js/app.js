import './bootstrap';


const maxFiles = 5;
console.log('hihihihi')

// Отслеживаем изменения в форме ввода
document.querySelector('#multiFile').addEventListener('change', function() {

  // Если выбрано файлов больше, чем установлено в лимите, очищаем форму и выводим сообщение
  if (this.files.length > maxFiles) {
    this.value = '';
    alert(`Вы превысили лимит выбора файлов: можно выбрать не более ${maxFiles} файлов.`);
  }
});