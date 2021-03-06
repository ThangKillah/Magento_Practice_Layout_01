<?php namespace OpenTechiz\Blog\Helper;

use Magento\Framework\App\Action\Action;

class Post extends \Magento\Framework\App\Helper\AbstractHelper
{
    
    protected $_post;
    protected $resultPageFactory;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \OpenTechiz\Blog\Model\Post $post,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->_post = $post;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }


    public function prepareResultPost(Action $action, $postId = null)
    {
        if ($postId !== null && $postId !== $this->_post->getId()) {
            $delimiterPosition = strrpos($postId, '|');
            if ($delimiterPosition) {
                $postId = substr($postId, 0, $delimiterPosition);
            }

            if (!$this->_post->load($postId)) {
                return false;
            }
        }

        if (!$this->_post->getId()) {
            return false;
        }
        
        $resultPage = $this->resultPageFactory->create();
        // We can add our own custom page handles for layout easily.
        $resultPage->addHandle('blog_post_view');

        // This will generate a layout handle like: blog_post_view_id_1
        // giving us a unique handle to target specific blog posts if we wish to.
        $resultPage->addPageLayoutHandles(['id' => $this->_post->getId()]);

        // Magento is event driven after all, lets remember to dispatch our own, to help people
        // who might want to add additional functionality, or filter the posts somehow!
        $this->_eventManager->dispatch(
            'opentechiz_blog_post_render',
            ['post' => $this->_post, 'controller_action' => $action]
        );

        return $resultPage;
    }
}
