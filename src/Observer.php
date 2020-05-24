<?php
namespace Ymt\Component;
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 2020/5/13
 * Time: 下午12:41
 */
class Observer implements \SplSubject{

    use Sington;

    private $observers = null;

    public function __construct() {
        $this->observers = new \SplObjectStorage();
    }

     //add observer
    public function attach(\SplObserver $observer) {
        $this->observers->attach($observer);
    }
   
    //remove observer
    public function detach(\SplObserver $observer) {
        $this->observers->detach($observer);
    }
   
   
    //notify observers(or some of them)
    public function notify() {
        $this->observers->rewind();
        while($this->observers->valid()) {
            $object = $this->observers->current();
            // dump($object);die;
            $object->update($this);
            $this->observers->next();
        }
    }
}