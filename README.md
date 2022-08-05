

## Тестовое задание.

- Сделать интерфейс для загрузки изображений по ссылке на страницу из интернета, с указанием минимальных размеров по высоте и ширине картинок, которые будут загружаться с указанной страницы, картинки ниже этих размеров грузится недолжны.
- найденные картинки уменьшаем по высоте до размера 200px
- определяем преобладающий цвет из перечисленных (черный, фиолетовый, синий, зелёный, желтый, оранжевый, красный, белый) и пишем на картинке его как водяной знак
- форма должна обрабатываться через AJAX с последующим выводом этих картинок на экран, без перезагрузки страницы, из каталога, при перезагрузке страницы так же уже сохраненные картинки должны выводится.
- при повторной загрузке картинок, они должны проверяться на идентичность уже имеющимся (способ проверки придумать самим)
- после загрузки картинки должны быть отсортированы по преобладающему цвету и выведены в виде стены превью на той же странице ниже,
- необходимо, чтобы картинки застраивали весь экран, строки должны быть
  одинаковыми по ширине, а картинки - одинаковыми по высоте.  
  -Картинки необходимо вывести отсортированными по цветам (черный, фиолетовый, синий, зелёный, желтый, оранжевый, красный, белый)
  -При изменении размеров экрана картинки должны перестраиваться.  
  -Алгоритм должен быть универсальным и работать с любыми картинками. В то же время, полезная часть картинки должна быть максимально открыта.

## Для большей наглядности ниже приведены ответы на наиболее задаваемые вопросы:

1.  Нужно ли реализовывать увеличение масштаба картинки при наведении курсора?
    Нет.
2.  В каком виде передать сделанную работу?
    Лучше комплект файлов, которые можно без лишних настроек разместить на сервере.
    В идеале так же предоставить ссылку на работающий скрипт на вашем сервере
3.  Что означает фраза: "строки должны быть одинаковыми по ширине"?
    Справа (у правого края экрана) края картинок не должны быть лесенкой, а четко по
    одной линии.
4.  Нужно ли при клике осуществлять переход или может увеличение на
    разметка в третьем. Или все должно быть в одном файле
    Как Вам удобно.

5.  Обязательно ли применение JS/AJAX в тестовом задании?
    Обязательно для демонстрации Ваших навыков в этой области. Загрузка картинок, определение цветов, помещение на картинку текста должны быть реализованы на php, представление
    картинок в виде стены должно быть на js, допускается использование библиотек, однако необходимо алгоритм выстраивания картинок реализовать самому.
    P.S. Приветствуется использование в написании ООП и MVC для демонстрации Ваших
    навыков, обратите внимание, важно не только написать скрипт,но и чтобы он корректно и быстро работал (некоторые делают обрезку картинок в php отсылая данные пропорций через ajax , так не пойдёт мы смотрим не только на код и ошибки, но и само решение соискателя и подход к выполнению ТЗ).
    Перед отправкой готового ТЗ проверяйте, чтобы скрипт работал на IE, FF, Chrome и
    Opera.
    Проверяйте уменьшение экрана (сдвиганием границы окна браузера) и изменение
    масштаба - всё должно корректно работать.
    Размещать на картинках текст, следует нанесением этого текста на само изображение, а не средствами HTML, CSS.
    Типичные ошибки:
    • Выравнивают строки за счёт изменения отступа между картинками, соответственно для каждой строки отступ разный
    • Выстраивают картинки в «сетку» с равной шириной и высотой контейнера
    • Текст на изображение наложен div-ом поверх картинки

![Image alt](https://github.com/Soluyanov-Andrey/gallery/blob/master/tz.PNG)
