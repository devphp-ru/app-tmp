## Шаблоны корпоративных приложений

### Шаблон Transaction Script
ветка: NB-1<br>
Он прост, интуитивно понятени эффективен, хотя все эти качества ухудшаются по мере роста системы.<br>
Шаблон Transaction Script (Сценарий транзакций) обрабатывает запрос внутри, а не делегирует его специализированным объектам.<br>
Это типичный способ получить быстрый результат.<br>
Данный шаблон трудно отнести к какой-нибудь категории, поскольку он сочетает элементы из разных уровней, описанных в этой главе.<br>
Он представлен здесь как часть уровня логики приложения, поскольку основное назначение данного шаблона реализовать цели, стоящие перед системой.<br>


### Шаблон Data Mapper
ветка: NB-2<br>
Шаблона Data Mapper служит для формирования объектов передачи данных.<br>
Data Mapper — это класс, который отвечает за управление передачей данных из базы данных в отдельный объект.<br>
