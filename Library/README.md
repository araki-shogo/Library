https://crane01.sakura.ne.jp/library/

#### 貸し出し状況
一覧表示です、自分が借りている本があれば下に表示されます

#### 本一覧・貸出履歴
詳細ページにいくとそれぞれの詳細が見れます

本一覧 => 編集（管理者のみ）, 貸出返却ボタン

貸出履歴 => 履歴表示

それぞれ10件単位で10件を超えるとペジネーションが表示されます

#### 未ログインユーザー
ヘッダーにあるページや検索はログインしなくても見れますが、ログインしていないと貸出などはできません

#### 管理者
管理者だけが本とユーザーの削除の権限を持っています

マスタユーザーならヘッダーにユーザーの管理画面と貸出・返却で削除ボタンが表示されます

初期データで入ります

```
mail: master@master.master
pass: master
```
![image](https://user-images.githubusercontent.com/65150262/130565560-27ef6609-72ab-4e97-87f6-a39dd092ab55.png)


#### 通知
本を借りたときと返したときにslackで通知します
```
App\Models\Lending.phpのrouteNotificationForSlackメソッド`でslackのURLをreturn
```
