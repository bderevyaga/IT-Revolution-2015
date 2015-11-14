<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\RegForm;
use app\models\Event;
use app\models\Userinfo;
use yii\helpers\Html;
use yii\helpers\Url;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['user']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['user']);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUser($id = null)
    {

        $event = Event::getAll(Yii::$app->user->identity->id);
        $userinfo = Userinfo::getAll(Yii::$app->user->identity->id);        
        $content = $this->renderPartial('userinfo', [
            'event' => $event,
            'userinfo' => $userinfo,
        ]);
        return $this->render('user', [
            'content' => $content,
            
        ]);
    }

    public function actionFriends($id = null)
    {
        
        $content = $this->renderPartial('friends');
        return $this->render('user', [
            'content' => $content,
        ]);
    }

    public function actionChat($id = null)
    {
        
        $content = $this->renderPartial('chat');
        return $this->render('user', [
            'content' => $content,
        ]);
    }

    public function actionStore($id = null)
    {
        
        $content = $this->renderPartial('store');
        return $this->render('user', [
            'content' => $content,
        ]);
    }

    public function actionHostel($id = null)
    {
        
        $content = $this->renderPartial('hostel');
        return $this->render('user', [
            'content' => $content,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegistration()
    {
        $model = new RegForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                $user->status === User::STATUS_ACTIVE;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;
        return $this->render(
            'registration',
            [
                'model' => $model
            ]
        );
    }

    public function actionActivateAccount($key)
    {
        try {
            $user = new AccountActivation($key);
        }
        catch(InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if($user->activateAccount()):
            Yii::$app->session->setFlash('success', 'Активация прошла успешно. <strong>'.Html::encode($user->username).'</strong> вы теперь с phpNT!!!');
        else:
            Yii::$app->session->setFlash('error', 'Ошибка активации.');
            Yii::error('Ошибка при активации.');
        endif;
        return $this->redirect(Url::to(['/main/login']));
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAddevent()
    {
        return ;
    }

    public function actionUseredit()
    {
        if(Yii::$app->request->isPost){
            Userinfo::savedate(Yii::$app->request->post());
            return $this->redirect(['user']);
        }
        $dataModel = Userinfo::getAll(Yii::$app->user->identity->id);
        $model = new Userinfo();
        return $this->render('useredit', [
            'model' => $model,
            '$dataModel' => $dataModel,
        ]);
    }
}
